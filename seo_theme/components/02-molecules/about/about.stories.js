import './about.scss';
import about from './about.twig';
import aboutdata from './about.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/about' };

export const aboutstyle = () => about(aboutdata);
