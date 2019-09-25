var data;
var errors;
var dat;

function getData(form){
    data = JSON.stringify(form.serializeArray())
    return data;
}

function values(formData){
     lvalue=JSON.parse(formData);
       for(var key in lvalue)
       {
           $('#'+lvalue[key].name).val(lvalue[key].value);
       }
}

function getErrors(res){

    var errors = JSON.parse(JSON.stringify(res.responseJSON.errors))
    for(var key in errors) {
        var Inputselector = "#"+key;
        var ErrorSelector = ".error-"+key;
        $(Inputselector).addClass('error_message');
        $(ErrorSelector).html(errors[key]);
      }
}

