import './team.scss';
import team from './team.twig';
import teamdata from './team.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/team' };

export const teams = () => team(teamdata);
