import '../../../node_modules/bootstrap/dist/css/bootstrap.min.css';
import '../../../node_modules/bootstrap/dist/js/bootstrap.min';
import './cardsection.scss';
import cardsection from './cardsection.twig';
import cardsectiondata from './cardsection.yml';
import moleculescard from '../../02-molecules/servicecard/card.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Organisms/cardsection' };

export const card = () => cardsection({ ...cardsectiondata, ...moleculescard });
