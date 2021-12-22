import 'package:get/get.dart';
import 'package:vncitizens_home/src/services/configuration_service.dart';

class ConfigurationController {
  final _configurationService = Get.put(ConfigurationService());
  var _configuration = {};

  ConfigurationController() {
    _fetchConfiguration();
  }

  get configuration => _configuration;

  _fetchConfiguration() async {
    _configuration = await _configurationService.fetchConfiguration();
  }
}
