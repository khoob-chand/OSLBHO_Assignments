import './topmenu.scss';
import topmenu from './topmenu.twig';
import topmenudata from './topmenu.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/TopMenus' };

export const headmenu = () => topmenu(topmenudata);
