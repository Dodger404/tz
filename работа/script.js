function sendAjaxRequest(ajaxParams) 
{ 
	if(typeof ajaxParams == 'object') 
	{ 
		if(!ajaxParams.hasOwnProperty('url')) 
		{ 
			throw "Не указан урл"; 
			return; 
		} 
		if(ajaxParams.hasOwnProperty('data')) 
		{ 
			if(typeof ajaxParams.data != 'object') 
			{ 
				throw "Переданы некорректные данные"; 
				return; 
			} 
		} 
		else 
		{ 
			ajaxParams.data = {}; 
		} 
		if(!ajaxParams.hasOwnProperty('type')) 
		{ 
			ajaxParams.type = "POST"; 
		} 
		if(!ajaxParams.hasOwnProperty('dataType')) 
		{ 
			ajaxParams.dataType = "json"; 
		} 
	} 
	else 
	{ 
		throw "Параметр функции должен быть объектом"; 
		return; 
	} 
	ajaxParams.data.ajaxRequest = 1; 

	var result = $.ajax({ 
		type: ajaxParams.type, 
		url: ajaxParams.url, 
		data: (ajaxParams.data), 
		dataType: ajaxParams.dataType, 
		async: false, 
	}).responseText; 
	return result; 
}

$(document).ready(function(){

	$('.delite').click(function(){

		$(this).parent().remove();

		var post = {};

		post.id = $(this).parent().attr('data-id');

		var result = sendAjaxRequest({
				url: '/index.php',
				data: post
		});
		var result = jQuery.parseJSON(result);
		var status = result.status;

		if(status = 1){
			alert('Пользователь удалён!');
		} else {
			alert('Произошла какая-то ошибка!');
		}

	});

	$('.button_add').click(function(){

		$('.main_face').addClass('none');

		$('.hide_face').removeClass('none');

	});

	$('.add').click(function(){

		var post = {};

		post.check = 1;

		post.login = $('.add_users_list_login').val();
		post.pass = $('.add_users_list_pass').val();
		post.email = $('.add_users_list_email').val();

		if(post.login != '' && post.pass != '' && post.email != ''){

			var result = sendAjaxRequest({
				url: '/index.php',
				data: post
			});
			var result = jQuery.parseJSON(result);
			var status = result.status;

			if(status == 1){
				
				alert('Пользователь добавлен!');

				location.reload();

			} else {
				alert('Данные заполнены не корректно!');
			}
		} else {
			alert('Заполните, пожалуйста, все поля!');
		}

	});

	$('.close-modal').click(function(){

		$('.main_face').removeClass('none');

		$('.hide_face').addClass('none');

		$('.add_users_list_login').val('');
		$('.add_users_list_pass').val('');
		$('.add_users_list_email').val('');

	});

})