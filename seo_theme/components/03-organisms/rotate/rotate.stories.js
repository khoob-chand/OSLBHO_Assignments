import './rotate.scss';
import cardsection from './rotate.twig';
import cardsectiondata from './rotate.yml';
// import moleculescard from '../../02-molecules/rotate/rotate.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Organisms/rotate' };

export const card = () => cardsection(cardsectiondata);
