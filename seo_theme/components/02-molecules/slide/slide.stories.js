import './slide.scss';
import slide from './slide.twig';
import slidedata from './slide.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/slide' };

export const exampleslide = () => slide(slidedata);
