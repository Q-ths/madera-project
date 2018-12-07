$(function () {
    $('.bootstrapTable').bootstrapTable();

    $(document).on('click','#add-section',function(event){
        event.preventDefault();

        var data = {
            'delete' : true
        };
        $.ajax({
            url: "addSection",
            type: "get",
            data: data ,
            success: function (html) {
                $('#sections').append(html);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });

    });

});