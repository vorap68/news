$(document).ready(function () {

    // эта ф-ция запускается после нажатия на кнопку submit c id=myform . 
    // И получает методом post значения переменных(#fullname  #textfeed) из формы(#myform) 
    // а также путь к изображению ( e.target.result)
    function readImage(input) {
        if (input.files && input.files['0']) {
            var reader = new FileReader();
            reader.onload = function (e) {

                $('#second').append("<div class='container '>\n\
                        <div class = 'row row-eq-height'>\n\
                             <div class = 'col-md-4'><img src=" + e.target.result + " style='height:240px'>  </div>\n\
                             <div class = 'col-md-8'>\n\
                                 <div class = 'row text-info'>" + $('#fullname').val() + "</div>\n\
                                 <br>\n\
                                 <div class = 'row'>" + $('#textfeed').val() + "</div>\n\
                              </div>\n\
                        </div>\n\
                        </div>\n\
                </div>");
            }
            reader.readAsDataURL(input.files['0']);
        }
    }

    $('#myform').submit(function (event) {
        if (($('form').attr('action')) == 'send') {
            form.submit();
        }
        ;
        event.preventDefault();

        $('#second').css('display', 'block');
        $('#third').css('display', 'block');
        $('#first1').css('display', 'none');
        $('#myform').css('display', 'none');
        readImage(document.getElementById('image'));
    })
// при нажатии кнопки submit c id=sendPreview срабатывает стандарт метод action формы со значением аттрибута action = send
// и запускает запрос  account/send 
    $('#sendPreview').click(function () {
        $('#myform')[0].action = 'send';
        $('#myform')[0].submit();
    })
})

