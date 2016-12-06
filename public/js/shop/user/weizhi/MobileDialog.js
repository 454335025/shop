define("weizhi/MobileDialog", [], function () {
    return '<div class="ui-dialog <%=element%>"> <%if(showTitle) {%> <div class="ui-dialog-title"> <div><%=title%></div> <%if(showClose) {%> <div class="ui-dialog-close"></div> <%}%> </div> <%}%> <%if(showContent) {%> <div class="ui-dialog-content"><%=content%></div> <%}%> <%if(btn == 2){%> <div class="ui-dialog-btn"> <div class="ui-dialog-cancel"><%=cancel%></div> <div class="ui-dialog-ok"><%=ok%></div> </div> <%}else if(btn == 1){%> <div class="ui-dialog-btn"> <div class="ui-dialog-ok" style="border-left: none;width: 100%;" ><%=ok%></div> </div> <%}%> </div>'
});