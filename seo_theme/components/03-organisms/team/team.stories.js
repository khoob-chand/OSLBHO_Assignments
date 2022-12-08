import './team.scss';
import egslider from './team.twig';

import egslideryml from './team.yml';

import molecules from '../../02-molecules/team/team.yml';

import teamheading from '../../02-molecules/teamheading/teamheading.yml';

export default { title: 'Organisms/team' };

export const teamexample = () =>
  egslider({ ...egslideryml, ...molecules, ...teamheading });
