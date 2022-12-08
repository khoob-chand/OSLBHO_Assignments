import './seotheme.scss';
import egslider from './seotheme.twig';

import egslideryml from './seotheme.yml';

import topmenu from '../../02-molecules/topmenu/topmenu.yml';
import welcome from '../../02-molecules/welcome/welcome.yml';
import service from '../../02-molecules/services/service.yml';
import about from '../../02-molecules/about/about.yml';
import servicecard from '../../02-molecules/servicecard/card.yml';
import cardsection from '../../03-organisms/cardsection/cardsection.yml';
import teamheading from '../../02-molecules/teamheading/teamheading.yml';
import moleculeteam from '../../02-molecules/team/team.yml';
import team from '../../03-organisms/team/team.yml';
import slider from '../../03-organisms/slider/slider.yml';
import slide from '../../02-molecules/slide/slide.yml';
import footer from '../../02-molecules/footer/footer.yml';
import rotate from '../../03-organisms/rotate/rotate.yml';
import rotatemolecule from '../../02-molecules/rotate/rotate.yml';

export default { title: 'templates/seotheme' };

export const teamexample = () =>
  egslider({
    ...egslideryml,
    ...topmenu,
    ...welcome,
    ...service,
    ...about,
    ...servicecard,
    ...cardsection,
    ...teamheading,
    ...moleculeteam,
    ...team,
    ...slide,
    ...slider,
    ...footer,
    ...rotate,
    ...rotatemolecule,
  });
