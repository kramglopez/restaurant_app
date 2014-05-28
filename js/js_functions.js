
/*
function: check_required_fields
params: required_fields (e.g required_fields  = {'username': $('input[name=login]'), 'password' : $('input[name=password]')});
usage: to check if the fields have value hence will change the css style if the required field is null
author: Justin ^_-
*/

function check_required_fields(required_fields){
  var count = 0;
  $.each(required_fields, function(key,value){
   // console.log(value.val());
	if(!value.val()){
	    $(value).css('background-color', '#FF8073');
		count++;
	}else{
	   $(value).css('background-color', '#FFFFFF');
	}
  });
  return count;
}

function show_hide(show,hide){
  $(show).slideToggle();
  $(hide).slideToggle();
}

function is_json_string(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}