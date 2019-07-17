class Route{
    API ={
        auth:'../Api/Auth.php?request=GET&action=Authentication'
    }
    routes = {
        binnacle:'binnacle.php',
        employees:'employees.php',
        eventcosts:'eventcosts.php',
        events:'events.php',
        eventview:'eventview.php',
        home:'home.php',
        login:'../private/',
        myevents:'myevents.php',
        products:'products.php',
        profile:'profile.php',
        requests:'requests.php',
        shares:'shares.php',
        signup:'signup.php',
        typeevents:'typeevents.php',
        
        authUser(id){
            if(id == 0) {
                $(location).attr('href',this.login);
                //window.location.href = this.login;
                //window.location.replace(this.login);
                //history.pushState({}, null, this.login);
            }
        }
    }
    sessionAuth(){
        const route = this.routes;
        const apiAuth = this.API.auth;
        $.ajax({
            url:apiAuth,
            type:'POST',
            data:null,
            datatype:'JSON'
        })
        .done(function(response){
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status){
                    route.authUser(result.id);
                }
                else{
                    console.log(result);
                    route.authUser(result.id,result.Role);
                }
            }
            else{
                console.log(response);
            }
            
        })
        .fail(function(jqXHR){
            console.log("Fallo");
        })
    }
    verifyUrl(route){
        console.log(route);
        switch(route){
            case this.routes.login:
                alert("estas en login");
            break;
            case this.routes.signup:
                alert("estas en registro");
            break;
            case this.routes.home:
                this.sessionAuth();
            break;
            case this.routes.events:
                this.sessionAuth();     
                break;
            case this.routes.typeevents:
                this.sessionAuth();
                break;
            case this.routes.employees:
                this.sessionAuth();
                break;
            case this.routes.products:
                this.sessionAuth();
                break;
            case this.routes.eventview:
                this.sessionAuth();
                break;
            case this.routes.requests:
                this.sessionAuth();
                break;
            case this.routes.profile:
                this.sessionAuth();
                break;
            case this.routes.shares:
                this.sessionAuth();
                break;
            case this.routes.binnacle:
                this.sessionAuth();
                break;
            case this.routes.myevents:
                this.sessionAuth();
                break;
            case this.routes.eventcosts:
                this.sessionAuth();
                break;
            
            default:
                $(location).attr('href',this.routes[404]);
        }
      }
    
}