let Obj = {};
let sourceDir = ""; // for localhost "/OFDS/public"
(function ($){
    $(document).ready(function(){
        Obj = {
            // Change Country action
            country:function (e){
                let value = $(e).val();
                if (value === 'Bangladesh')
                {
                    let url = window.location.origin + sourceDir + "/hidden-dirr/get-division";
                    $.getJSON({
                        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url:url,
                        type:"POST",
                        success:function (data)
                        {
                            if (data.error){
                                // throw data.error.msg;
                                alert(data.error.msg)
                            }else{
                                $(data.results).each(function (){
                                    let division = "<option value=\"" + this.id + "\">" + this.name +"</option>";
                                    $("#divisionlist").append(division);
                                });
                            }
                        }
                    });
                }
            }
        }
    })
}(jQuery));


