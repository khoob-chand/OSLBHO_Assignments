import '../../../node_modules/bootstrap/dist/css/bootstrap.min.css';
import '../../../node_modules/bootstrap/dist/js/bootstrap.min';
import './card.scss';
import card from './card.twig';
import carddata from './card.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/servicescard' };

export const cards = () => card(carddata);
