import egslider from './slider.twig';

import egslideryml from './slider.yml';

import molecules from '../../02-molecules/slide/slide.yml';

import 'slick-carousel/slick/slick';

import './slider.scss';

import '../../../node_modules/slick-carousel/slick/slick.scss';

import '../../../node_modules/slick-carousel/slick/slick-theme.css';

import './slider';

export default { title: 'Organisms/sliders' };

export const slider = () => egslider({ ...egslideryml, ...molecules });
