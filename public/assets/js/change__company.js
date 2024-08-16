$(".inactives").on("click",function(){

    let activeCompany=$(".actives").data("active");
    let inactiveCompany=$(".inactives").data("inactive");
    //console.log(activeCompany);

    $.ajax({
        type:"GET",
        url:"/changeCompany",
        data:{'active':activeCompany, 'inactive':inactiveCompany},
        success:function(response){
            //console.log(response);
            window.location.href="/company";
        }
    });
});
