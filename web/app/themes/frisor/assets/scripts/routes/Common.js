/* eslint-disable global-require */
import { Common } from '../util/common';

export default {
  init() {
    Common.initPace();
    Common.backgroundLazyload();
  },
  finalize() {


  },
};
