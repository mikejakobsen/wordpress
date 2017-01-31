import Instafeed from 'instafeed.js/instafeed.min';

export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // Instagram feed
    // Loades on all pages
    if ($('#instagram').size() > 0) {
      const feed = new Instafeed({
        accessToken: $('#instagram .accessToken').val(),
        get: 'user',
        userId: $('#instagram .userId').val(),
        target: 'instagram',
        template: '<a href="{{link}}" target="_blank"><img src="{{image}}" /></a>',
      });
      feed.run();
    }
  },
};
