"use strict";!function(a){a(function(){a("#default").raty(),a("#score").raty({score:3}),a(".score-callback").raty({score:function(){return a(this).attr("data-score")}}),a("#scoreName").raty({scoreName:"entity[score]"}),a("#number").raty({number:10}),a("#number-callback").raty({number:function(){return a(this).attr("data-number")}}),a("#numberMax").raty({numberMax:5,number:100}),a("#readOnly").raty({readOnly:!0,score:3}),a("#readOnly-callback").raty({readOnly:function(){return!0}}),a("#noRatedMsg").raty({readOnly:!0,noRatedMsg:"I'am readOnly and I haven't rated yet!"}),a("#halfShow-true").raty({score:3.26}),a("#halfShow-false").raty({halfShow:!1,score:3.26}),a("#round").raty({round:{down:.26,full:.6,up:.76},score:3.26}),a("#half").raty({half:!0}),a("#starHalf").raty({half:!0,starHalf:"fa fa-star-half"}),a("#click").raty({click:function(t,e){alert("ID: "+a(this).attr("id")+"\nscore: "+t+"\nevent: "+e.type)}}),a("#hints").raty({hints:["a",null,"",void 0,"*_*"]}),a("#star-off-and-star-on").raty({starOff:"fa fa-bell-o",starOn:"fa fa-bell"}),a("#cancel").raty({cancel:!0}),a("#cancelHint").raty({cancel:!0,cancelHint:"My cancel hint!"}),a("#cancelPlace").raty({cancel:!0,cancelPlace:"right"}),a("#cancel-off-and-cancel-on").raty({cancel:!0,cancelOff:"fa fa-minus-square-o",cancelOn:"fa fa-minus-square"}),a("#iconRange").raty({starOff:"lib/images/star-off.png",iconRange:[{range:1,on:"fa fa-cloud",off:"fa fa-circle-o"},{range:2,on:"fa fa-cloud-download",off:"fa fa-circle-o"},{range:3,on:"fa fa-cloud-upload",off:"fa fa-circle-o"},{range:4,on:"fa fa-circle",off:"fa fa-circle-o"},{range:5,on:"fa fa-cogs",off:"fa fa-circle-o"}]}),a("#size").raty({cancel:!0,half:!0,size:24}),a("#width").raty({width:150}),a("#target-div").raty({cancel:!0,target:"#target-div-hint"}),a("#target-text").raty({cancel:!0,target:"#target-text-hint"}),a("#target-textarea").raty({cancel:!0,target:"#target-textarea-hint"}),a("#target-select").raty({cancel:!0,target:"#target-select-hint"}),a("#targetType").raty({cancel:!0,target:"#targetType-hint",targetType:"score"}),a("#targetKeep").raty({cancel:!0,target:"#targetKeep-hint",targetKeep:!0}),a("#targetText").raty({target:"#targetText-hint",targetText:"--"}),a("#targetFormat").raty({target:"#targetFormat-hint",targetFormat:"Rating: {score}"}),a("#mouseover").raty({mouseover:function(t,e){alert("ID: "+a(this).attr("id")+"\nscore: "+t+"\nevent: "+e.type)}}),a("#mouseout").raty({width:150,mouseout:function(t,e){alert("ID: "+a(this).attr("id")+"\nscore: "+t+"\nevent: "+e.type)}})})}(jQuery);