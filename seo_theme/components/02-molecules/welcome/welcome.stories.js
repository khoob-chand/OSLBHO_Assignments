import './welcome.scss';
import welcome from './welcome.twig';
import welcomedata from './welcome.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/welcome' };

export const headmenu = () => welcome(welcomedata);
