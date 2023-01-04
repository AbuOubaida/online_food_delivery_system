let Obj = {};
let sourceDir = ""; // for localhost "/OFDS/public"
(function ($){
    $(document).ready(function(){
        Obj = {
            // Change Country action
            country:function (e){
                let value = $(e).val();
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
                            console.log(data);
                        }
                    }
                });
            }
        }
    })
}(jQuery));


