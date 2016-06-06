$(document).ready(function(){



	$("#add").click(function(event){
		if ($("div.addform").css('display')=='none'){
			$(this).html('-');
		} else {
			$(this).html('+');
		}
		$("div.addform").toggle('normal');
	});

	$("#submit").click(function(event){
		event.preventDefault();
			var formData = {
            'url'               : $('input[name=urlinput]').val(),
            'tag'               : $('input[name=tagsinput]').val(),
            'description'    	: $('textarea[name=descinput]').val(),
            'password'    		: $('input[name=passinput]').val()
        	};
            //alert(formData['password']);

          $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'add.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : "json",
        	success: function(data) {
                if (data[0]!='bad'){
            		$("div.addform").toggle('normal');
            		$("#add").html('+');
            		$("div#status").html("<span style='color:green;'>Sucessfuly added!</span>");
            		$("div#status").delay(1000).fadeOut(800);
            		$("#add_form").trigger("reset");
            		$("ul#url_list").html(data[0]);
                    $("div#tags_div").html(data[1]);
        	   };
            }
         });
	   });	


		$("a.tag").live("click", function(event){
		event.preventDefault();
			var tagname=$(this).attr('id');
			var Data={
				'tagname': tagname,
			};
          $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'tag.php', // the url where we want to POST
            data        : Data, // our data object
        	success: function(data) {
                $("span.close_tag").remove();
                var tags="<div id='tags_list'><span class='lead small close_tag' style='position:relative; top:-20px;'>x "+ tagname + "</span></div>";
                $("div#links").prepend(tags);
        		$("ul#url_list").html(data);
        		/*$("div.addform").toggle('normal');
        		$("#add").html('+');
        		$("div#status").html("<span style='color:green;'>Sucessfuly added!</span>");
        		$("div#status").delay(1000).fadeOut(800);
        		$("#add_form").trigger("reset");
        		//$("div#status").hide();*/
        		}
        	});
		});


        $("span.close_tag").live("click", function(event){
            event.preventDefault();
            $("div#tags_list").remove();
            $.ajax({
                type: 'GET',
                url: 'urls.php',
                success: function(data){
                    $("ul#url_list").html(data);
                }
            })
        });



});