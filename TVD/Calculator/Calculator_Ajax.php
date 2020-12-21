<!doctype html>
<html>
<head>
    <title>calculator Tutorial</title>
    <meta charset="utf-8">
    <style type="text/css">
        table{
            background-color: #ABB1BA;
            margin: auto;
        }
        #result{
            width: 416px;
            height: 70px;
        }
        .btn{
            width: 80px;
            height: 80px;
        }
        #equ{
            width: 80px;
            height: 164px;
        }
        #zero{
            width: 164px;
            height: 80px;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<table>
    <tr>
        <td colspan="7"><input id="result" type="text" disabled></td>
    </tr>
    <tr>
        <td><input type="button" class="btn" value="7"></td>
        <td><input type="button" class="btn" value="8"></td>
        <td><input type="button" class="btn" value="9"></td>
        <td><input type="button" class="btn" value="/"></td>
        <td><input type="button" class="btn" value="C"></td>
    </tr>
    <tr>
        <td><input type="button" class="btn" value="4"></td>
        <td><input type="button" class="btn" value="5"></td>
        <td><input type="button" class="btn" value="6"></td>
        <td><input type="button" class="btn" value="*"></td>
        <td><input type="button" class="btn" value="AC"></td>
    </tr>
    <tr>
        <td><input type="button" class="btn" value="1"></td>
        <td><input type="button" class="btn" value="2"></td>
        <td><input type="button" class="btn" value="3"></td>
        <td><input type="button" class="btn" value="-"></td>
        <td rowspan="2"><input id="equ" type="button" class="btn" value="="></td>
    </tr>
    <tr>
        <td colspan="2"><input type="button" id="zero" class="btn" value="0"></td>
        <td><input type="button" class="btn" value=","></td>
        <td><input type="button" class="btn" value="+"></td>
    </tr>
</table>
<script type="text/javascript">
    var a = '', b = '', cal = '';
    $(function () {
        $('input').click(function () {//add tất cả sự kiện lên thẻ input
            // console.log($(this).val());
            var v = $(this).val();
            switch (v) {
                case '+':
                case '-':
                case '*':
                case '/':
                    cal = v;
                    break;
                case '=':
                    //subit data
                    onsubmit();
                    break;
                case 'AC':
                case 'C':
                    a = '';
                    b = '';
                    cal = '';
                default:
                    if (cal != ''){
                        //nhập cho b
                        b += v;
                    }else {
                        //nhập cho a
                        a += v;
                    }
                    break;
            }
            $('#result').val(a + cal + b);
        })
    })
    function onsubmit() {
        console.log(a+ cal +b);
        // onsubmitPost();
        onsubmitGet();
    }
    function onsubmitPost() {
       $.post('Ajax.php', {
           'a':a,
           'b':b,
           'cal':cal
       }, function (data) {
            console.log(data);
            $('#result').val(a + cal + b + '=' + data);
       })
    }
    function onsubmitGet() {
        $.get('Ajax.php?a='+a+'&cal='+encodeURIComponent(cal)+'&b='+b, {
            'a':a,
            'b':b,
            'cal':cal
        }, function (data) {
            console.log(data);
            $('#result').val(a + cal + b + '=' + data);
        })
    }

</script>
</body>
</html>
