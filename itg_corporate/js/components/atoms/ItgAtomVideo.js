export const ItgAtomVideo = function () {
  let VideoContainer = document.getElementsByClassName('itgAtom__ItgVideo');

  for (const video of VideoContainer) {
    let VideoCta = video.getElementsByTagName('a')[0];
    let VideoOverlay = video.getElementsByClassName('itgAtom__ItgVideo--overlay')[0];
    let VideoElement = video.getElementsByTagName('video');
    let IframeElement = video.getElementsByTagName('iframe');
    if (VideoElement.length > 0 || IframeElement.length > 0) {
      VideoCta.addEventListener('click', function (e) {
        e.preventDefault();
        if (VideoElement[0]) {
          VideoElement[0].classList.toggle('active');
          VideoOverlay.classList.toggle('active');
        }else if(IframeElement[0]){
          IframeElement[0].classList.toggle('active');
          VideoOverlay.classList.toggle('active');
        }
      });
      VideoOverlay.addEventListener('click', function () {
        if (VideoElement[0]) {
          VideoElement[0].classList.toggle('active');
        }else if(IframeElement[0]){
          let IframeElementSrc = IframeElement[0].getAttribute('src')
          IframeElement[0].classList.toggle('active');
          IframeElement[0].setAttribute('src', '')
          IframeElement[0].setAttribute('src', IframeElementSrc)
        }
        VideoOverlay.classList.toggle('active');
      });
    }
  }
};

ItgAtomVideo();
