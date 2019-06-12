$(document).ready(function () {
   
});
function modalInit(){
    $('.modal').modal('');
}
function requestGET(API,Action){
    const APIGet = '../Api/'+ API +'.php?request=GET&action=' + Action;
    return APIGet;
}

function requestPOST(API, Action){
    const APIPost = '../Api/'+ API + '.php?request=POST&action=' + Action;
    return APIPost;
}

function requestPUT(API,Action){
    const APIPut = '../Api/'+ API + '.php?request=PUT&action='+Action;
    return APIPut;
}

function requestDELETE(API, Action){
    const APIDelete = '../Api/'+ API + '.php?request=DELETE&action='+Action;
    return APIDelete;
}
/** request to Public sites */
function requestPublicGET(API,Action){
    const APIGet = 'Api/'+ API +'.php?request=GET&action=' + Action;
    return APIGet;
}

function requestPublicPOST(API, Action){
    const APIPost = 'Api/'+ API + '.php?request=POST&action=' + Action;
    return APIPost;
}

function requestPublicPUT(API,Action){
    const APIPut = 'Api/'+ API + '.php?request=PUT&action='+Action;
    return APIPut;
}

function requestPublicDELETE(API, Action){
    const APIDelete = 'Api/'+ API + '.php?request=DELETE&action='+Action;
    return APIDelete;
}

function isJSONString(string)
{
    try {
        if (string != "[]") {
            JSON.parse(string);
            return true;
        } else {
            return false;
        }
    } catch(error) {
        return false;
    }
}
function ToastSucces(messageSucces){
    var success = M.toast({html:messageSucces});
    return success;
}
function ToastError(messageError){
    var error = M.toast({html:messageError});
    return error;
}
function ClearForm(Form){
    $('#'+Form)[0].reset();
}
function closeModal(modal){
    $('#'+modal).modal('close');
}
function catchError(jqueryError){
    var failMessage =  console.log('Error: ' + jqueryError.status + ' ' + jqueryError.statusText);
    return failMessage;
}

