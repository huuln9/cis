import 'package:get/get.dart';
import 'package:vncitizens/services/configuration_service.dart';

class ConfigurationController {
  final _configurationService = Get.put(ConfigurationService());
  var _configuration = {};

  ConfigurationController() {
    _fetchConfiguration();
  }

  getConfiguration() => _configuration;

  _fetchConfiguration() async {
    _configuration = await _configurationService.fetchConfiguration();
  }
}
