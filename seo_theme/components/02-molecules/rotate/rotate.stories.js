import './rotate.scss';
import rotate from './rotate.twig';

import rotateData from './rotate.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/rotate' };

export const rotateExample = () => rotate(rotateData);
