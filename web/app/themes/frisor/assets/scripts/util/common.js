/* eslint-disable import/no-extraneous-dependencies */
import Pace from 'pace';
import imagesLoaded from 'imagesloaded';

export const Common = {
  // Pace Progress Bar
  initPace: () => {
    Pace.start();

    // Load elements
    const load = (elem) => {
      elem.removeClass('unloaded');
      elem.removeClass('loaded');
      elem.addClass('animated');
      elem.addClass('fadeIn');

      setTimeout(() => {
        elem.removeClass('animated');
        elem.removeClass('fadeIn');
        elem.addClass('loaded');
      }, 1500);
    };

    // Progress bar on done
    Pace.on('done', () => {
      const unloadedElem = $('.unloaded');

      unloadedElem.each(() => {
        const self = $(this);
        load(self);
      });
    });
  },
  // Background Lazy Load
  backgroundLazyload() {
    document.addEventListener('lazybeforeunveil', (e) => {
      const elem = e;
      const bg = elem.target.getAttribute('data-bg');
      if (bg) {
        elem.target.style.backgroundImage = `url(${bg})`;
        imagesLoaded(e.target, { background: true }, () => {
          elem.target.className += ' fadeIn';
        });
      } else {
        imagesLoaded(e.target, {}, () => {
          elem.target.className += ' fadeIn';
        });
      }
    });
  },
};

export default Common;
