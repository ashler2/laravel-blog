
<script defer>

  CKEDITOR.replace( 'article_body' );
  
  
</script>
<script>

  var data = CKEDITOR.instances.article_body.getData();
  let button = document.getElementById('blog-submit')
  let textarea = document.getElementById('article_body');
  button.addEventListener('click', function () {
    textarea.value = CKEDITOR.instances.article_body.getData()
  })

</script>