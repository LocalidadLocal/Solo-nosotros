const mostrarBtn = document.querySelector("#mostrar");
const nosotrosBtn = document.querySelector("#nosotros");
const poema = document.querySelector("#poema");
const ferPlaylist = document.querySelector("#ferPlaylist");
const andyPlaylist = document.querySelector("#andyPlaylist");
const listaDeReproduccion = [
    'ymJ1svwvpLQ', 'QlZNGcVfeF0', 'x1ayw8GRJUo', 'aSjflT_J0Xo', 'U5yU2KPw1WY',
    'ZYslw-iBm8U', 'Kbyp0QQM__g', 'a1ozTSkE27U', '9QHiXsBtmmI', 'LgQYPqr9Rho',
    '85qbNFHshdY', 'dNa5gs24gis', 'jMNRg3nHwU0', 'KWGrPNqz4uc', 'f10mB6fKszU',
    'aBSkvI0CkgU', '_6XzJPyAJDI', '4THFRpw68oQ', 'b1cbgrcBrY0', 'hf5oi2c_jjM',
];
let indiceCancionActual = 0;

const reproducir = function (videoId) {
    const contenedorVideoExistente = document.querySelector("#contenedorVideo");
    if (contenedorVideoExistente) {
        contenedorVideoExistente.remove();
    }

    const contenedorVideo = document.createElement("div");
    contenedorVideo.id = "contenedorVideo";
    contenedorVideo.style.textAlign = "center";

    const contenedorVideoPadre = document.getElementById("video-container");

    const iframe = document.createElement("iframe");
    iframe.src = videoId;
    const screenWidth = window.innerWidth;
    iframe.style.width = screenWidth > 560 ? "560px" : "100%";
    iframe.style.height = screenWidth > 560 ? "315px" : "auto";
    iframe.allow = "accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture";
    iframe.allowFullscreen = true;
    iframe.id = "reproductor";

    contenedorVideo.appendChild(iframe);
    contenedorVideoPadre.appendChild(contenedorVideo);
};

const reproducirSiguiente = function () {
    indiceCancionActual = (indiceCancionActual + 1) % listaDeReproduccion.length;
    reproducir(`https://www.youtube.com/embed/${listaDeReproduccion[indiceCancionActual]}`);
};

mostrarBtn.addEventListener("click", function () {
    poema.style.display = "block";
    ferPlaylist.style.opacity = 0;
    andyPlaylist.style.opacity = 0;
});

nosotrosBtn.addEventListener("click", function () {
    ferPlaylist.style.opacity = 1;
    andyPlaylist.style.opacity = 1;
});

const tag = document.createElement('script');
tag.src = 'https://www.youtube.com/iframe_api';
const firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

let player;
function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '0',
        width: '0',
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
}

function onPlayerReady(event) {
}

function onPlayerStateChange(event) {
    if (event.data === YT.PlayerState.ENDED) {
        reproducirSiguiente();
    }
}
