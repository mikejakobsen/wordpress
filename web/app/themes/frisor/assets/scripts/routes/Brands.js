/* eslint-disable global-require */
export default {
  init() {
    // JavaScript to be fired on the home page
    require.ensure([], () => {
      require('../../styles/brands.scss');
    });
  },
  finalize() {
  },
};
