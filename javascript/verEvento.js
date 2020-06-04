$(function(){
    $('.btnExcluir').on('click', function(){
        id = $(this).attr('id');
        swal({   
            title: 'Tem certeza disto?',   
            text: 'Você quer mesmo excluir este evento?',   
            type: 'warning',   
            showCancelButton: true,   
            confirmButtonColor: '#3085d6',   
            cancelButtonColor: '#d33',   
            confirmButtonText: 'Sim, excluir!',   
            cancelButtonText: 'Não, cancelar!',   
            closeOnConfirm: true,   
            closeOnCancel: false 

        },
        function(isConfirm){
            if(isConfirm){
                $.ajax({
                    type: "GET",
                    data: { controle : 'evento', acao : 'excluir', id : id},
                })
                .done(function(){
                    $(location).attr('href','?controle=evento&acao=excluir&id=' + id);
                });
            } else {
               swal({   title: 'Cancelado',   text: 'O evento continua cadastrado! :)',  type: 'error', timer: 3000 });
            }
        });
    })   
})