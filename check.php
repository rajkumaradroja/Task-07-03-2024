<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkbox Content Visibility</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .content {
            display: none;
        }
    </style>
</head>

<body>


    <h2>Checkbox 1</h2>
    <label for="checkbox1">Toggle Content Visibility:</label>
    <input type="checkbox" id="checkbox1">

    <div class="content" id="content1">
        Content is visible!
    </div>

    <script>

        $(document).ready(function () {
            // Check if there's a session stored to remember the visibility state
            if (isChecked === 'true') {//if it is checked than it will shows the content of checkbox
                $('#content1').show();
                $('#checkbox1').prop('checked', true);
            }

            var cookieValue = getCookie('checkbox1_preference');//getting cookie name if it exist and returns true and shows he content of checkbox
            if (cookieValue === 'true') {
                $('#content1').show();//show content
                $('#checkbox1').prop('checked', true);//set property to true 
            }

            $('#checkbox1').click(function () {//while clicking on checkbox
                var isChecked = $(this).prop('checked');//it will get the current state of the checkbox if it is checked than....
                if (isChecked) {
                    $('#content1').show();

                    var date = new Date();//assign time to sdate variable
                    date.setTime(date.getTime() + (30 * 24 * 60 * 60 * 1000));//set the time of 30 days
                    document.cookie = "checkbox1_preference=true; expires=0";//assign cookie name and value in consol

                }
                else {
                    $('#content1').hide();

                    document.cookie = "checkbox1_preference=false ;expires=0";//set session expires time if it is false
                }
            });

            function getCookie(name) {
                var cookieArr = document.cookie.split(';');//split the cookie name and store into variable
                for (var i = 0; i < cookieArr.length; i++) {
                    var cookiePair = cookieArr[i].split('=');//split into key and value format
                    if (name === cookiePair[0].trim()) {//remove white spaces if it exist
                        return decodeURIComponent(cookiePair[1]);//is used to decode the cookie value back to its original form before 
                    }
                }
                return null;
            }
        });

    </script>

</body>

</html>
