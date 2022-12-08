import './teamheading.scss';
import team from './teamheading.twig';
import teamdata from './teamheading.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/teamheading' };

export const teams = () => team(teamdata);
