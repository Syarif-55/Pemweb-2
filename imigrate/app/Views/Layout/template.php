<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <link rel="stylesheet" href="css/style.css">
    <a class="navbar-brand" href="/">📚 Pasar Buku</a>
    
    </div>
  </div>
</nav>

 <?= $this->rendersection('content'); ?>
 <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS (untuk toggler menu) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

  function previewImg() {
    const sampul = document.querySelector('#sampul');
    const sampulLabel = document.querySelector('.input-group-text');
    const imgPreview = document.querySelector('.img-preview');

    sampulLabel.textContent = sampul.files[0].name;

    const fileSampul = new FileReader();
    fileSampul.readAsDataURL(sampul.files[0]);

    fileSampul.onload = function(e) {
      imgPreview.src = e.target.result;
    }
  }


</script>
