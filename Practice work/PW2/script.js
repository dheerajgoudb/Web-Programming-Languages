$(document).ready(function(){
  $( "#load" ).click(function() {
  if($('#check').prop('checked')) {
	$.ajax({
            url: "books.xml",
            dataType: "xml",
            success: function(data){
				$("#output").append('<tr><th>TITLE</th><th>AUTHOR</th><th>CATEGORY</th><th>YEAR</th><th>PRICE</th></tr>');
				$(data).find('book').each(function(){
                var title = $(this).find('title').text();
                var author = $(this).find('author').text();
				var category = $(this).attr('category');
				var year=  $(this).find('year').text();
				var price=  $(this).find('price').text();
				var info = '<tr><td>'+title+'</td><td>'+author+'</td><td>'+category+'</td><td>'+year+'</td><td>'+price+'</td></tr>';
				$("#output").append(info);
				});   				
            }
        });	 
  } else {
    alert("Please check the box")
  }
});
});