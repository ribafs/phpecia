<script type="text/javascript" src="jquery.min.js"></script>

<body>
    <form id="myForm" method="post" action="" >
        Nome:
        <input type="text" name="nome" required />
        <br/>
        Tipo:
        <input type="text" name="tipo" required />
        <br/>
        Criado em:
        <input type="text" name="criado_em" required />
        <br/>
        <input type="submit" name="submit" value="save" id="sub"/>
    </form>

</body>
<script type="text/javascript">
$(document).ready(function(){
    $('#myForm').submit(function(){
        var parametro = $(this).serialize();

        $.ajax({
            url: "user.php",
            type: "POST",
            data: parametro,
            success: function( data )
            {
                alert( data );
            },
            error: function(){
                alert('ERRO');
            }
        });

        return false;
    });
});
</script> 
