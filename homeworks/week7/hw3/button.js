
  $(document).ready(function(){
    $('.comments').on('click', '.delete-comment', function(e){
      if(!confirm('是否確定要刪除？')) return
      const id = $(e.target).attr('data-id');

      $.ajax({
        method: "POST",
        url: "./delete_comment.php",
        data: { 
          id 
        }
      }).done(function(response) {
          const msg = JSON.parse(response)
          alert(msg.message)
          const subComment = $(e.target).parent('.sub-comment')
          if (subComment.length === 0) {
            $(e.target).parent().hide(200)
          } else {
            subComment.hide(200)
          }
      }).fail(function(){
          alert('刪除失敗!')
      });
    })
  })


  $(document).ready(function(){
    $('.comments').on('click', '.edit-comment', function(){
      if(!confirm('是否確定要編輯？')) return
      const id = $(e.target).attr('data-id');

      $.ajax({
        method: "POST",
        url: "./edit_comment.php",
        data: { 
          id 
        }
      }).done(function(response) {
          const msg = JSON.parse(response)
          alert(msg.message)
          const subComment = $(e.target).parent('.sub-comment')
          if (subComment.length === 0) {
            $(e.target).parent('.card-body').hide(200)
          } else {
            subComment.hide(200)
          }
      }).fail(function(){
          alert('刪除失敗!')
      });
    })
  })