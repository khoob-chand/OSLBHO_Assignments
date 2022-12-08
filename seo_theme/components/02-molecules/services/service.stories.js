import '../../../node_modules/bootstrap/dist/css/bootstrap.min.css';
import '../../../node_modules/bootstrap/dist/js/bootstrap.min';
import './service.scss';
import service from './service.twig';
import servicedata from './service.yml';

/**
 * Storybook Definition.
 */
export default { title: 'Molecules/service' };

export const services = () => service(servicedata);
