console.log("Welcome to BLISSED!!");

//Initialize the variables
let songIndex = 0;
let audioElement = new Audio('songs/1.mp3');
let masterPlay = document.getElementById('masterPlay');
let myProgressBar = document.getElementById('myProgressBar');
let masterSongName = document.getElementById('masterSongName');
let masterArtistName = document.getElementById('masterArtistName');
let songItems = Array.from(document.getElementsByClassName('card'));

let songs = [
    {songName: "Sulthan", artistName: "Brijesh Shandilya", filePath: "songs/1.mp3", 
    coverPath: "covers/1"},
    {songName: "Pasoori", artistName: "Shae Gill", filePath: "songs/2.mp3", 
    coverPath: "covers/2.jpeg"},
    {songName: "Aankhon Se Batana", artistName: "Dikshant", filePath: "songs/3.mp3", coverPath: "covers/3.jpeg"},
    {songName: "Srivalli", artistName: "Javed Ali", filePath: "songs/4.mp3", 
    coverPath: "covers/4.jpeg"},
    {songName: "Rait Zara Si", artistName: "A. R. Rahman", filePath: "songs/5.mp3", 
    coverPath: "covers/5.jpeg"},
    {songName: "We Rollin", artistName: "Shubh", filePath: "songs/6.mp3", 
    coverPath: "covers/6.jpeg"},
    {songName: "Dynamite", artistName: "Dhvani Bhanushali", filePath: "songs/7.mp3", 
    coverPath: "covers/7.jpeg"},
    {songName: "Main Royaan", artistName: "Yasser Desai", filePath: "songs/8.mp3", 
    coverPath: "covers/8.webp"},
    {songName: "Tabahi", artistName: "Badshah", filePath: "songs/9.mp3", 
    coverPath: "covers/9.jpg"},
    {songName: "Kesariya", artistName: "Pritam", filePath: "songs/10.mp3", 
    coverPath: "covers/10.webp"},

    {songName: "Stay", artistName: "The Kid LAROI", filePath: "songs/11.mp3", 
    coverPath: "covers/11.png"},
    {songName: "Unstoppable", artistName: "Sia", filePath: "songs/12.mp3", 
    coverPath: "covers/12.jpeg"},
    {songName: "Let Me Love You", artistName: "Justin Bieber", filePath: "songs/13.mp3", 
    coverPath: "covers/13.jpg"},
    {songName: "Industry Baby", artistName: "Lil Nas X", filePath: "songs/14.mp3", 
    coverPath: "covers/14.jpg"},
    {songName: "Gangsta's Paradise", artistName: "Coolio", filePath: "songs/15.mp3", 
    coverPath: "covers/15.jpeg"},
    {songName: "No Lie", artistName: "Sean Paul", filePath: "songs/16.mp3", 
    coverPath: "covers/16.webp"},
    {songName: "On My Way", artistName: "Alan Walker", filePath: "songs/17.mp3", 
    coverPath: "covers/17.jpg"},
    {songName: "Heat Waves", artistName: "Glass Animals", filePath: "songs/18.mp3", 
    coverPath: "covers/18.jpeg"},
    {songName: "Cheap Thrills", artistName: "Sia", filePath: "songs/19.mp3", 
    coverPath: "covers/19.jpeg"},
    {songName: "Middle Of The Night", artistName: "Elley Duhe", filePath: "songs/20.mp3", 
    coverPath: "covers/20.png"},

    {songName: "Raatan Lambiyan", artistName: "Tanishk Bagchi", filePath: "songs/21.mp3", 
    coverPath: "covers/21.webp"},
    {songName: "Meri Jaan", artistName: "Neeti Mohan", filePath: "songs/22.mp3", 
    coverPath: "covers/22.jpeg"},
    {songName: "The Monster Song", artistName: "Ravi Basrur", filePath: "songs/23.mp3", 
    coverPath: "covers/23.webp"},
    {songName: "Doobey", artistName: "OAFF, Savera", filePath: "songs/24.mp3", 
    coverPath: "covers/24.webp"},
    {songName: "Jugnu", artistName: "Badshah", filePath: "songs/25.mp3", 
    coverPath: "covers/25.jpeg"},
    {songName: "Chaand Baaliyan", artistName: "Aditya A", filePath: "songs/26.mp3", 
    coverPath: "covers/26.jpeg"},
    {songName: "Shayad", artistName: "Pritam, Arijit Singh", filePath: "songs/27.mp3", 
    coverPath: "covers/27.jpeg"},
    {songName: "Param Sundari", artistName: "A. R. Rahman", filePath: "songs/28.mp3", 
    coverPath: "covers/28.webp"},
    {songName: "Hawayein", artistName: "Pritam, Arijit Singh", filePath: "songs/29.mp3", 
    coverPath: "covers/29.jpeg"},
    {songName: "Gehraiyaan", artistName: "OAFF, Savera", filePath: "songs/30.mp3", 
    coverPath: "covers/30.jpeg"},

    {songName: "Mehabooba", artistName: "Ananya Bhat", filePath: "songs/31.mp3", 
    coverPath: "covers/31.jpg"},
    {songName: "ily", artistName: "Surf Mesa", filePath: "songs/32.mp3", 
    coverPath: "covers/32.jpeg"},
    {songName: "O Sanam", artistName: "Lucky Ali", filePath: "songs/33.mp3", 
    coverPath: "covers/33.jpeg"},
    {songName: "Kabhi Kabhi Aditi", artistName: "Rashid Ali", filePath: "songs/34.mp3", 
    coverPath: "covers/34.jpg"},
    {songName: "Space Song", artistName: "Beach House", filePath: "songs/35.mp3", 
    coverPath: "covers/35.jpg"},
    {songName: "Mere Bina", artistName: "Pritam", filePath: "songs/36.mp3", 
    coverPath: "covers/36.jpeg"},
    {songName: "Sapna Jahan", artistName: "Sonu Nigam", filePath: "songs/37.mp3", 
    coverPath: "covers/37.jpg"},
    {songName: "Tum Ko", artistName: "Kavita Krishnamurthy", filePath: "songs/38.mp3", 
    coverPath: "covers/38.jpg"},
    {songName: "Yeh Raaten Yeh Mausam", artistName: "Sanam", filePath: "songs/39.mp3", 
    coverPath: "covers/39.jpeg"},
    {songName: "The Night We Met", artistName: "Lord Huron", filePath: "songs/40.mp3", 
    coverPath: "covers/40.jpg"},

    {songName: "Arcade", artistName: "Duncan Laurence", filePath: "songs/41.mp3", 
    coverPath: "covers/41.jpeg"},
    {songName: "All The Things She Said", artistName: "Cabuizee", filePath: "songs/42.mp3", 
    coverPath: "covers/42.jpeg"},
    {songName: "Fed Up", artistName: "Ghostemane", filePath: "songs/43.mp3", 
    coverPath: "covers/43.jpg"},
    {songName: "Enemy", artistName: "Imagine Dragons", filePath: "songs/44.mp3", 
    coverPath: "covers/44.jpeg"},
    {songName: "Whoopty", artistName: "CJ", filePath: "songs/45.mp3", 
    coverPath: "covers/45.jpeg"},
    {songName: "Tokyo Drift", artistName: "Teriyaki Boyz", filePath: "songs/46.mp3", 
    coverPath: "covers/46.jpeg"},
    {songName: "Into Your Arms", artistName: "Witt Lowry", filePath: "songs/47.mp3", 
    coverPath: "covers/47.webp"},
    {songName: "Stereo Hearts", artistName: "Gym Class Heroes", filePath: "songs/48.mp3", 
    coverPath: "covers/48.jpeg"},
    {songName: "Sahara", artistName: "Hensonn", filePath: "songs/49.mp3", 
    coverPath: "covers/49.jpeg"},
    {songName: "Die A King", artistName: "iamjakehill", filePath: "songs/50.mp3", 
    coverPath: "covers/50.jpg"}
]

songItems.forEach((element, i)=>{
    element.getElementsByTagName("img")[0].src=songs[i].coverPath;
    element.getElementsByClassName("songName")[0].innerHTML=songs[i].songName;
    element.getElementsByClassName("artistName")[0].innerHTML=songs[i].artistName;
})

// audioElement.play();

//Handle play/pause click
masterPlay.addEventListener('click', ()=>{
    if(audioElement.paused || audioElement.currentTime<=0){
        audioElement.play();
        masterPlay.classList.remove('fa-play');
        masterPlay.classList.add('fa-pause');

    }
    else
    {
        audioElement.pause();
        masterPlay.classList.remove('fa-pause');
        masterPlay.classList.add('fa-play');
    }
})

//Listen to events
audioElement.addEventListener('timeupdate', ()=>{
    //update seekbar
    progress = parseInt((audioElement.currentTime/audioElement.duration)*100);
    myProgressBar.value = progress;
})

myProgressBar.addEventListener('change', ()=>{
    audioElement.currentTime = myProgressBar.value * audioElement.duration/100;
})

const makeAllPlays=()=>{
    Array.from(document.getElementsByClassName('songItemPlay')).forEach((element)=>{
        element.classList.remove('bi-pause-circle');
        element.classList.add('bi-play-circle');
    })
};
Array.from(document.getElementsByClassName('songItemPlay')).forEach((element)=>{
    element.addEventListener('click', (e)=>{
        makeAllPlays();
        songIndex = parseInt(e.target.id);
        e.target.classList.remove('bi-play-circle');
        e.target.classList.add('bi-pause-circle');
        audioElement.src = `songs/${songIndex+1}.mp3`;
        audioElement.currentTime = 0;
        audioElement.play();
        masterPlay.classList.remove('fa-play');
        masterPlay.classList.add('fa-pause');
        masterSongName.innerText = songs[songIndex].songName;
        masterArtistName.innerText = songs[songIndex].artistName;
    })
})


document.getElementById('next').addEventListener('click',()=>{
    if(songIndex>=49){
        songIndex=0;
    }
    else{
        songIndex += 1;
    }
    audioElement.src = `songs/${songIndex+1}.mp3`;
    audioElement.currentTime = 0;
    audioElement.play();
    masterPlay.classList.remove('fa-play');
    masterPlay.classList.add('fa-pause');
    masterSongName.innerText = songs[songIndex].songName;
    masterArtistName.innerText = songs[songIndex].artistName;
})

document.getElementById('previous').addEventListener('click',()=>{
    if(songIndex<=0){
        songIndex=0;
    }
    else{
        songIndex -= 1;
    }
    audioElement.src = `songs/${songIndex+1}.mp3`;
    audioElement.currentTime = 0;
    audioElement.play();
    masterPlay.classList.remove('fa-play');
    masterPlay.classList.add('fa-pause');
    masterSongName.innerText = songs[songIndex].songName;
    masterArtistName.innerText = songs[songIndex].artistName;
})