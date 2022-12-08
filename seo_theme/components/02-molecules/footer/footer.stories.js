import './footer.scss';
import footer from './footer.twig';
import footerdata from './footer.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/footer' };

export const fooetrexample = () => footer(footerdata);
