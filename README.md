# FormParse

Laravel Package With JS to handle Ajax From Request.

# Installation

1. Via Composer [ composer require sudeep/formparse ]
2. add "require" : { "sudeep/formparse": "dev-master" } in your composer.json
    and run [ composer update ]

# Usage

1. Add  Sudeep\FormParser\FormServiceProvider::class, in 'providers' array of config/app.php file.
2. Run [ php artisan vendor:publish --provider=FormServiceProvider ] in CLI.
    this will save the JS file in your public/assets folder.
3. Next you Can make your own traits to use wherever you want. Or, you can directly use it in you main controller. just add [ use Sudeep\FormParser\FormParse;] in your app\http\controllers\Controller.php.

4. link form.js to your blade.file

5. After you call ajax function .
    # Call getData(formObject) function. it requires form object as parameter.
    # Call getErrors(response) function to show errors came from laravel.
    ------------------------------------------------------------------
        *for this you have to keep same value of id attr. as that of name attr.
                [ input type='text' name='address' id='address' ]
    ---------------------------------------------------------------------
        *to show error you have to keep class name with (error-) prepended in same value of name attr.
                [ span class='error-address']
___________________________________________________________________________________________________________
                $(document).on('submit','.form-class', function(e){
                        e.preventDefault();
                        var data = getData($(this))
                        $.ajax({
                            method: "POST",
                            url:  '/your/url/to/post,
                            data: { data: data },
                        }).done(function( res ) {
                            if(res == "ok"){
                                var url = "/url/to/redirect";
                            setTimeout($(location).attr('href', url),3000); 
                            }
                        }).fail( function(res){
                            getErrors(res)
                            })
                    })
___________________________________________________________________________________________________________
6. Now in your Controller.

    public function toDoSomething(Request $request){

    # call getArray() to get result in array
       $result = $this->getArray($request);
    # call getObj() to get result in object 
        $result = $this->getObj($request);
-------------------------------- FOR VALIDATION -----------------------------------------------

# make rules of validation and pass it through withvalidate()
        $this->withValidate($result, $rules);
# if you work with Form Requests Pass the Class with result.
        $this->withValidate($result, new FormRequest());