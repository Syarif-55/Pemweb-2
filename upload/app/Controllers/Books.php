<?php

namespace App\Controllers;

use App\Models\BookModel;

class Books extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BookModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Buku',
            'buku' => $this->bukuModel->findAll()
        ];

        return view('books/index', $data);
    }

    public function detail($slug)
    {
        $buku = $this->bukuModel->getBuku($slug);
        if (empty($buku)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Judul buku '$slug' tidak ditemukan.");
        }

        $data = [
            'title' => 'Detail Buku',
            'buku' => $buku
        ];

        return view('books/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Buku',
            'validation' => \Config\Services::validation()
        ];
        return view('books/create', $data);
    }

   public function save()
{
     if (!$this->validate([
                'judul' => 'required',
                'judul' => [
                    'rules' => 'required|is_unique[books.judul]',
                    'errors' => [
                        'required' => '{field} buku harus diisi',
                        'is_unique' => '{field} buku sudah dimasukkan'
                    ]
                ],
                'sampul' => [
                    'rules' => 'uploaded[sampul]|max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'Pilihlah gambar yang sesuai',
                        'max_size' => 'Ukuran file kebesaran',
                        'is_image' => 'File anda pilih bukan gambar',
                        'mime_in' => 'File anda pilih bukan gambar'
                    ]
                ],
       'penulis' => 'required',
                'penerbit' => 'required'
            ])
        ) {
            return redirect()->to('/books/create')->withInput()->with('validation', $this->validator);
        }
         // Ambil file sampul
        $fileSampul = $this->request->getFile('sampul');
        // Generate nama file random
        $namaSampul = $fileSampul->getRandomName();
         // Pindahkan file ke folder imgA
        $fileSampul->move('img', $namaSampul);

        $slug = url_title($this->request->getVar('judul'), '-', true);

        $data = [
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ];
         try {
            $this->bukuModel->save($data);
            session()->setFlashdata('pesan', 'Buku berhasil ditambahkan.');
            return redirect()->to('/books');
        } catch (\Exception $e) {
            // Jika ada error, hapus file yang sudah diupload
            if (isset($namaSampul) && file_exists('img/' . $namaSampul)) {
                unlink('img/' . $namaSampul);
            }
            die($e->getMessage());
        }
    }

   public function delete($id)
{
    // cari nama gambar
    $buku = $this->bukuModel->find($id);

    // cek jika file gambar bukan default
    if ($buku['sampul'] != 'no-cover.jpg') {
        // hapus file gambar
        unlink('img/' . $buku['sampul']);
    }

    $this->bukuModel->delete($id);

    session()->setFlashdata('pesan', 'Data berhasil dihapus');
    return redirect()->to('/books');
}

 public function edit($slug): string
{
    $data = [
            'title' => 'Form Ubah Buku',
            'validation' => \Config\Services::validation(),
            'buku' => $this->bukuModel->getBuku($slug)
        ];
        return view('books/edit', $data);
    }
    public function update($id)
    {
        // Ambil data lamaAdd commentMore actions
        $bukuLama = $this->bukuModel->getBuku($this->request->getVar('slug'));

        // Validasi judul
        $judulRule = ($bukuLama['judul'] == $this->request->getVar('judul')) ? 'required' : 'required|is_unique[books.judul]';

        // Validasi untuk update
        $validationRules = [
            'judul' => [
                'rules' => $judulRule,
                'errors' => [
                    'required' => '{field} buku harus diisi',
                    'is_unique' => '{field} buku sudah dimasukkan'
                ]
            ],
            'penulis' => 'required',
            'penerbit' => 'required',
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran file kebesaran',
                    'is_image' => 'File anda pilih bukan gambar',
                    'mime_in' => 'File anda pilih bukan gambar'
                ]
            ]
        ];
         if (!$this->validate($validationRules)) {
            return redirect()->to('/books/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $this->validator);
        }
          $fileSampul = $this->request->getFile('sampul');
        $namaSampul = $bukuLama['sampul']; // Default ke sampul lama
          // Jika upload file baruAdd commentMore actions
        if ($fileSampul->isValid() && !$fileSampul->hasMoved()) {
            // Generate nama file random
            $namaSampul = $fileSampul->getRandomName();
              // Pindahkan file ke folder imgAdd commentMore actions
            $fileSampul->move('img', $namaSampul);

            // Hapus file lama jika bukan no-cover.jpg
            if ($bukuLama['sampul'] != 'no-cover.jpg') {
                $path = FCPATH . 'img/' . $bukuLama['sampul'];
                if (is_file($path)) {
                    @unlink($path);
                }
            }
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);

        $this->bukuModel->save([
            'id' => $id,
             'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
             'sampul' => $namaSampul
        ]);
        session()->setFlashdata('pesan', 'Data Buku Berhasil Diedit!');
        return redirect()->to('/books');
         $gambarSampul = $this->request->getFile('sampul');

        if ($gambarSampul->getError()) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            $namaSampul = $gambarSampul->getRandomName();
            $gambarSampul->move('img', $namaSampul);
            unlink('img/' . $this->request->getVar('sampulLama'));
        }

    }
}
