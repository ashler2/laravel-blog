
<script defer>

  CKEDITOR.replace( 'article_body' )
  
  
</script>
<script defer>

  let button = document.getElementById('blog-submit')
  let textarea = document.getElementById('article_body');
  // CKEDITOR.instances.article_body.setData(textarea.value)
  button.addEventListener('click', function () {
    textarea.value = CKEDITOR.instances.article_body.getData()
  })


</script>