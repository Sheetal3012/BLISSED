console.log('I am searching song on BLISSED!');

const APIController = (function() {
    
    const clientId = 'PASTE YOUR CLIENT ID HERE';
    const clientSecret = 'PASTE YOUR CLIENT SECRET HERE';

    // private methods
    const _getToken = async () => {

        const result = await fetch('https://accounts.spotify.com/api/token', {
            method: 'POST',
            headers: {
                'Content-Type' : 'application/x-www-form-urlencoded', 
                'Authorization' : 'Basic ' + btoa( clientId + ':' + clientSecret)
            },
            body: 'grant_type=client_credentials'
        });

        const data = await result.json();
        return data.access_token;
    }

    fetch('https://api.spotify.com/v1/search').then((data)=>{
    console.log(data);
    })

});


// fetch('https://api.spotify.com/v1/search').then((data)=>{
//     console.log(data);
// })