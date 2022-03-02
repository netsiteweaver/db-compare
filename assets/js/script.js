var tableLeft = [];
var tableRight = [];

jQuery(function(){
    $('#table-right .field').each(function(){
        let table = $(this).closest('tr').data('table')
        let field = $(this).text()
        tableRight.push(table+"::"+field)
    })
    $('#table-left .field').each(function(){
        let table = $(this).closest('tr').data('table')
        let field = $(this).text()
        tableLeft.push(table+"::"+field)
    })

    $('body').on('click','#closeOverlay', function(){
        $('#overlay').remove();
    })

    $('body').on('click','#minimizeOverlay', function(){
        $(this).addClass("hidden");
        $('#restoreOverlay').removeClass("hidden");
        $('#overlay').addClass("minimized")
    })

    $('body').on('click','#restoreOverlay', function(){
        $(this).addClass("hidden");
        $('#minimizeOverlay').removeClass("hidden");
        $('#overlay').removeClass("minimized")
    })

    let maxRows = (tableLeft.length > tableRight.length) ? tableLeft.length : tableRight.length;

    $('body').append("<div id='overlay'><div id='minimizeOverlay'><i class='fa fa-window-minimize'></i></div><div id='restoreOverlay' class='hidden'><i class='fa fa-window-restore'></i></div><div id='closeOverlay'><i class='fa fa-window-close-o'></i></div><div class='result'>Analysing ...<br></div></div>");

    if(tableLeft.length != tableRight.length){
        $('.result').append("Total tables and fields differs by "+ (tableLeft.length-tableRight.length)+"<br>");
    }
    for(let i=0; i<maxRows; i++){
        if(tableLeft[i]!=tableRight[i]){
            $('.result').append(tableLeft[i]+" != "+tableRight[i]+'<br>')
            console.log(i,tableLeft[i],tableRight[i])
        }
    }
})