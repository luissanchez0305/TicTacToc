<html>
    <head>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <style>
            .field{
                width: 20px;
            }
        </style>
    </head>
    <body>
        <form id="theForm">
            <table>
                <tr>
                    <td><input type="text" name="a1" id="a1" class="field" /></td>
                    <td><input type="text" name="b1" id="b1" class="field" /></td>
                    <td><input type="text" name="c1" id="c1" class="field" /></td>
                </tr>
                <tr>
                    <td><input type="text" name="a2" id="a2" class="field" /></td>
                    <td><input type="text" name="b2" id="b2" class="field" /></td>
                    <td><input type="text" name="c2" id="c2" class="field" /></td>
                </tr>
                <tr>
                    <td><input type="text" name="a3" id="a3" class="field" /></td>
                    <td><input type="text" name="b3" id="b3" class="field" /></td>
                    <td><input type="text" name="c3" id="c3" class="field" /></td>
                </tr>
                <tr><td colspan="3"><input type="button" onclick="play()" value="Play" /></td></tr>
            </table>
        </form>
        <script>
            $('.field').keydown(function(event){
                if(event.which != 88 || $(this).val().length >= 1)
                    return false;
            });
            function play(){
                var _data = $('#theForm').serialize();
                $.ajax({
                    url: '/play.php',
                    data: _data,
                    success: function(response){
                        $('#' + response).val('O');
                        $('#' + response).attr('disabled', 'disabled');
                    }
                })
            }
        </script>
    </body>
</html>