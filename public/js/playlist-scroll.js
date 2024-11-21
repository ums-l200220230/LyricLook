const scrollLeftButton = document.getElementById('scroll-left');
const scrollRightButton = document.getElementById('scroll-right');
const playlistContainer = document.getElementById('playlist-container')

scrollLeftButton.addEventListener('click', () => {
    playlistContainer.scrollBy({
        left: -200, 
        behavior: 'smooth' 
    });
});

scrollRightButton.addEventListener('click', () => {
    playlistContainer.scrollBy({
        left: 200, 
        behavior: 'smooth' 
    });
});