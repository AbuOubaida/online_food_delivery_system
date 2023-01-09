let Obj = {};
let sourceDir = ""; // for localhost "/OFDS/public"
(function ($){
    $(document).ready(function(){
        Obj = {
            // Change Country action
            country:function (e,actionID){
                let value = $(e).val();
                $("#"+actionID).html("<option></option>");
                if (value === 'Bangladesh')
                {
                    let url = window.location.origin + sourceDir + "/hidden-dirr/get-division";
                    $.getJSON({
                        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url:url,
                        type:"POST",
                        data: {"value": value},
                        success:function (data)
                        {
                            if (data.error){
                                // throw data.error.msg;
                                let division = "<option></option>";
                                $("#"+actionID).append(division);
                                // alert(data.error.msg)
                            }else{
                                $(data.results).each(function (){
                                    let division = "<option value=\"" + this.name + "\">" + this.name +"</option>";
                                    $("#"+actionID).append(division);
                                });
                            }
                        }
                    });
                }
            },
            //Change division action
            division:function (e,actionID){
                let val = $(e).val();
                let url = window.location.origin + sourceDir + "/hidden-dirr/get-district";
                $.getJSON({
                    headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url:url,
                    type:"POST",
                    data:{"value":val},
                    success:function (data)
                    {
                        // console.log(data)
                        if (data.error){
                            // throw data.error.msg;
                            alert(data.error.msg)
                        }else{
                            $("#"+actionID).html("<option></option>");
                            $(data.results).each(function (){
                                let district = "<option value=\"" + this.name + "\">" + this.name +"</option>";
                                $("#"+actionID).append(district);
                            });
                        }
                    }
                });
            },
            //Change District action
            district:function (e,actionID){
                let val = $(e).val();
                let url = window.location.origin + sourceDir + "/hidden-dirr/get-upazila";
                $.getJSON({
                    headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url:url,
                    type:"POST",
                    data:{"value":val},
                    success:function (data)
                    {
                        // console.log(data)
                        if (data.error){
                            // throw data.error.msg;
                            alert(data.error.msg)
                        }else{
                            $("#"+actionID).html("<option></option>");
                            $(data.results).each(function (){
                                let district = "<option value=\"" + this.name + "\">" + this.name +"</option>";
                                $("#"+actionID).append(district);
                            });
                        }
                    }
                });
            },
            //Change Upazilla action
            upazilla:function (e,actionID,actionID2){
                let val = $(e).val();
                let url = window.location.origin + sourceDir + "/hidden-dirr/get-zip";
                $.getJSON({
                    headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url:url,
                    type:"POST",
                    data:{"value":val},
                    success:function (data)
                    {
                        // console.log(data)
                        if (data.error){
                            // throw data.error.msg;
                            alert(data.error.msg)
                        }else{
                            $("#"+actionID).html("<option></option>");
                            $(data.zipCods).each(function (){
                                let zip = "<option value=\"" + this.PostCode + "\"> (" + this.PostCode +")"+ this.SubOffice +"</option>";
                                $("#"+actionID).append(zip);
                            });
                            $("#"+actionID2).html("<option></option>");
                            $(data.unions).each(function (){
                                let union = "<option value=\"" + this.name + "\">" + this.name +"</option>";
                                $("#"+actionID2).append(union);
                            });
                        }
                    }
                });
            },
        }
    })
}(jQuery));


